<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240426122520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album_artist (album_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_D322AB301137ABCF (album_id), INDEX IDX_D322AB30B7970CF8 (artist_id), PRIMARY KEY(album_id, artist_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE track_album (track_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_496FCCE45ED23C43 (track_id), INDEX IDX_496FCCE41137ABCF (album_id), PRIMARY KEY(track_id, album_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album_artist ADD CONSTRAINT FK_D322AB301137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE album_artist ADD CONSTRAINT FK_D322AB30B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE track_album ADD CONSTRAINT FK_496FCCE45ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE track_album ADD CONSTRAINT FK_496FCCE41137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE album_track DROP FOREIGN KEY FK_A05BB2801137ABCF');
        $this->addSql('ALTER TABLE album_track DROP FOREIGN KEY FK_A05BB2805ED23C43');
        $this->addSql('ALTER TABLE artist_album DROP FOREIGN KEY FK_59945E101137ABCF');
        $this->addSql('ALTER TABLE artist_album DROP FOREIGN KEY FK_59945E10B7970CF8');
        $this->addSql('DROP TABLE album_track');
        $this->addSql('DROP TABLE artist_album');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album_track (album_id INT NOT NULL, track_id INT NOT NULL, INDEX IDX_A05BB2801137ABCF (album_id), INDEX IDX_A05BB2805ED23C43 (track_id), PRIMARY KEY(album_id, track_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE artist_album (artist_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_59945E10B7970CF8 (artist_id), INDEX IDX_59945E101137ABCF (album_id), PRIMARY KEY(artist_id, album_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE album_track ADD CONSTRAINT FK_A05BB2801137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE album_track ADD CONSTRAINT FK_A05BB2805ED23C43 FOREIGN KEY (track_id) REFERENCES track (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_album ADD CONSTRAINT FK_59945E101137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_album ADD CONSTRAINT FK_59945E10B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE album_artist DROP FOREIGN KEY FK_D322AB301137ABCF');
        $this->addSql('ALTER TABLE album_artist DROP FOREIGN KEY FK_D322AB30B7970CF8');
        $this->addSql('ALTER TABLE track_album DROP FOREIGN KEY FK_496FCCE45ED23C43');
        $this->addSql('ALTER TABLE track_album DROP FOREIGN KEY FK_496FCCE41137ABCF');
        $this->addSql('DROP TABLE album_artist');
        $this->addSql('DROP TABLE track_album');
    }
}
